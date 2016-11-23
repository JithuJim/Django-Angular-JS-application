from django.http import HttpResponse,HttpResponseRedirect
from django.shortcuts import render,redirect
import json
from google.appengine.ext import ndb
from notes.models import Task,User
from json import JSONEncoder
import logging
from gaesessions import *
email = ''

def register(request):
    if request.method=='POST':
        del session['login']
        data = json.loads(request.body)
        user = User()
        user.username = data['userName']
        user.password = data['password']
        user.email = data['email']
        user.put()
        return HttpResponse("success")
    return HttpResponse("error")

def login(request):
    if request.method=='POST':
        data = json.loads(request.body)
        email_logged = data['email']
        password = data['password']
        q= User.query()
        r = q.filter(User.email==email_logged).filter(User.password==password).get()
        if r:
            request.session['login'] = email_logged
            global email
            email = email_logged
            return HttpResponse("success")
        else:
            return HttpResponse("failure")
    return HttpResponse("error")

def session(request):
    if request.method=="POST":
        if request.session.get('login', None) == email and email != '':
            return HttpResponse('success')
        return HttpResponse('error')


def template(request):
    return render(request,'index.html')

def init_task(request):
    if request.method=='POST':
        task = Task.query().filter(Task.email==email)
        r = json.dumps([p.to_dict() for p in task])
        return HttpResponse(r, content_type="application/json")
    return render(request,'index.html')

def submit_task(request):
    if request.method=='POST':
        data = json.loads(request.body)
        task_inp = data['task']
        task_db = Task.get()
        task_db.email = email
        task_db.task = task_inp
        task_db.put()
        r = json.dumps([p.to_dict() for p in Task.query().filter(Task.email==email).fetch(keys_only=True)])
        return HttpResponse(r, content_type="application/json")
    return render(request,'index.html')

def delete_task(request):
    if request.method=='POST':
        data = json.loads(request.body)
        task_inp = data['task']
        q= Task.query()
        r = q.filter(Task.task==task_inp).fetch(keys_only=True)
        ndb.delete_multi(r)
        return HttpResponse("success")
    return render(request,'index.html')

def logout(request):
    if request.method=="POST":
        email = ''
        del request.session['login']
        return HttpResponse('success')
