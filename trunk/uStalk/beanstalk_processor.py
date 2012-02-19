import beanstalkc
from urllib.request import urlopen
import re

#make beanstalkd connection
beanstalk = beanstalkc.Connection(host='localhost', port=11300)

#get a job
job = beanstalk.reserve()

#job.body will contain the UID of the user that needs updated

#open database connection

#retrieve our user's postID

#get bungie forum page
bungiethread = urlopen('http://www.bungie.net/Forums/posts.aspx?postID=' + postID)

#use regex to get last post time
posthead = re.search(b"jmh9072<\/a>.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*last post: (.*) P", bungiethread.read())
print(posthead.group(1))

#update info in database

#remove job from queue and close connections
##disconnect database
job.delete()
beanstalk.close()
