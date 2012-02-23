import beanstalkc
import urllib2
import re
import MySQLdb

#make beanstalkd connection
beanstalk = beanstalkc.Connection(host='localhost', port=11300)

#get a job
job = beanstalk.reserve()

#job.body will contain the UID of the user that needs updated

#open database connection
database = MySQLdb.connect (host = "localhost, user = "ustalk", passwd="password", db="ustalk")

#retrieve our user's data
cursor = database.cursor()
cursor.execute("SELECT * FROM bungie WHERE id="+job.body) #do we need to escape job.body?
row = cursor.fetchone()


#get bungie forum page
bungiethread = urlopen('http://www.bungie.net/Forums/posts.aspx?postID=' + postID)

#make sure the last time we refreshed this user's data was more than 30 mintues ago

#use regex to get last post time
posthead = re.search(b"jmh9072<\/a>.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*last post: (.*) P", bungiethread.read())
print(posthead.group(1))

#update info in database

#close cursor and disconnect database
cursor.close()
database.close()

#remove job from queue and close connection
job.delete()
beanstalk.close()
