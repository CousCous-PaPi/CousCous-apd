import requests
import os
from crontab import CronTab
from datetime import datetime, date, timedelta
os.system('crontab -r')

response = requests.get('https://infgc.tk/~21v_danielv/apd/datatopi2.php')
tijden = response.text
tijdenlijst = tijden.split()
cron = CronTab(user='couscous')
job = cron.new(command='python3 /home/couscous/Desktop/getdata.py')
job.minute.every(5)
cron.write()
datum = tijdenlijst[0]
#vandaag = date.today()
datum = datetime.strptime(datum, "%Y-%m-%d")
y = 1
for x  in tijdenlijst:
    if (y >= len(tijdenlijst)):
        break
    datum = datum + timedelta(days=1)
    dag = datum.strftime("%d")
    maand = datum.strftime("%m")
    tijd = tijdenlijst[y].split(":")
    job = cron.new(command='python3 /home/couscous/Desktop/motorcode.py')
    job.minute.on(tijd[1])
    job.hour.on(tijd[0])
    job.dom.every(dag)
    job.month.every(maand)
    cron.write()
    y += 1
# Add a new cron job to run the script every day at 6 AM


# Write the job to the user's crontab