from django.conf.urls import *
from notes import views

urlpatterns = patterns('',
    url(r'^init_task$',views.init_task),
    url(r'^submit_task$',views.submit_task),
    url(r'^delete_task$',views.delete_task),
    url(r'^register$',views.register),
    url(r'^login$',views.login),
    url(r'^session',views.session),
    url(r'^logout',views.logout),
    url(r'^.*$',views.template),
)