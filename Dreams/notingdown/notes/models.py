from google.appengine.ext import ndb

class User(ndb.Model):
    username = ndb.StringProperty()
    password = ndb.StringProperty()
    email = ndb.StringProperty()
    session = ndb.StringProperty()

class Task(ndb.Model):
    email = ndb.StringProperty()
    task = ndb.StringProperty()
