from gaesessions import SessionMiddleware

# suggestion: generate your own random key using os.urandom(64)
import os
COOKIE_KEY = '@3x(agl%ux(#68^n8753!jqqwdqvok7y9bgad@a@u)8e+x_=n5'

def webapp_add_wsgi_middleware(app):
  from google.appengine.ext.appstats import recording
  app = SessionMiddleware(app, cookie_key=COOKIE_KEY)
  app = recording.appstats_wsgi_middleware(app)
  return app
