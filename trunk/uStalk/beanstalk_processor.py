import beanstalkc
from datetime import datetime, timedelta
from urllib2 import urlopen
import re
import MySQLdb

#make beanstalkd connection
beanstalk = beanstalkc.Connection() #The defaults work for us


#job.body will contain the UID of the user that needs updated

#open database connection
database = MySQLdb.connect(host = "localhost", user = "ustalk", passwd="password", db="ustalk")

def updateRow(bid, newtime, userpost):
  with database.cursor() as cursor:
    cursor.execute("UPDATE bungie SET on=%s, update=TIMESTAMP(), userpost=%s", (newtime, userpost, bid))
    cursor = database.cursor()

def updateUser(bid):
  #retrieve our user's data
  cursor = database.cursor()
  cursor.execute("SELECT bungie.update,name,userpost FROM bungie WHERE id=%s", (bid,))
  if cursor.rowcount > 0:
    row = cursor.fetchone()

    username = row[1]
    userpost = row[2]

    #make sure the last time we refreshed this user's data was more than 10 mintues ago
    if row[0] - datetime.now() > timedelta(minutes=10):    #Up to date
      print "Quickfinish: ",bid
      return;

  else:
    user_update_time = 0;
    username = None
    userpost = None

  done = False
  if userpost:
    #get bungie forum page
    bungiethread = urlopen('http://www.bungie.net/Forums/posts.aspx?postID=%s' % userpost)

    #use regex to get last post time
    posthead = re.search(r"%s<\/a>.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*last post: (.*) P" % username, bungiethread.read())
    if posthead:
      print "old postid finish:",bid
      updateRow(bid, datetime.strptime(posthead.group(1),"%m.%d.%Y %I:%M %p"), userpost)
      return

  #If we don't have a username, look one up by accessing the user's profile
  else:
    print "No username found for user",bid
    userpage = urlopen('http://www.bungie.net/Account/Profile.aspx?uid=%s' % bid)
    username = re.search(r"<span id=\"ctl00_mainContent_header_lblUsername\">([^<]*)/",userpage.read()) #what is wrong with this expression?
      if username:
        print "found",username
        # ADD: UPDATE DATABASE WITH NEWLY FOUND USERNAME

        #Find a post for the user doing a search by exact username
        #Grab the last post ID from the username.
        bungiesearch = urlopen('http://www.bungie.net/Search/default.aspx?g=5&q=%s' % username)


        #update info in database


      else:
        print "error getting username for user", bid

  #close cursor and disconnect database
  cursor.close()

while True:
  #get a job, and  update the user
  job = beanstalk.reserve()
  if job.body == "exit":
    break
  updateUser(job.body)
  db.commit()
  job.delete()

database.close()

#remove job from queue and close connection
beanstalk.close()
