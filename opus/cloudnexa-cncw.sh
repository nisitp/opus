#!/bin/bash

CRON=$(sudo find /var/spool/cron -type f -exec grep  'mon-put-instance-data.pl' {} \;)
if [[ -z "$CRON" ]]; then
        #Working directory is /home/ec2-user
        cd /home/ec2-user
        #Install the required packages
        sudo yum install -y perl-Switch perl-Sys-Syslog perl-LWP-Protocol-https
        #download the scripts
        wget http://ec2-downloads.s3.amazonaws.com/cloudwatch-samples/CloudWatchMonitoringScripts-v1.1.0.zip
        #unzip the folder contents
        unzip CloudWatchMonitoringScripts-v1.1.0.zip
        #remove the unecessary zip folder
        rm CloudWatchMonitoringScripts-v1.1.0.zip
        #echo in the crontab per the requirement
        crontab -l | { cat; echo "*/5 * * * * /home/ec2-user/aws-scripts-mon/mon-put-instance-data.pl --mem-util --swap-util --disk-space-util --disk-path=/ --from-cron "; } | crontab -

        #echo out the below line to /etc/rc.local
        printf "\n rm /var/tmp/aws-mon/instance-id\n" | sudo tee -a /etc/rc.local >/dev/null
else
        echo "The Cronjob already exists in /var/spool/cron, please confirm the metrics are populating"
        exit 1
fi

