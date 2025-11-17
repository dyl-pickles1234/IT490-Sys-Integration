NOTES FOR FINAL
- move db into rabbitmq machine
    - Webserver, RabbitMQ/DB, DMZ
- consider what we have to the Dev environment
- duplicate the dev env into new subnet; QA
    - where we test everything
- third duplicate is Prod env
- additional serveroff the side
    - needs to be able to see all the other envs
    - deployment server
    - no kubernetes, docker, etc
- writing own deployment system for packages
- multiple seperate packages
    - one for DB listener, one for backend of auth, one for backend of user stuff, etc
- dont use git for deployment
- deployment server also has db to store statuses of packages and deployments
- prod should only have things that were tested and passed
- need to be able to rollback
- deployment server also has rabbit mq and listener for db
- DB should keep track if it failed mark the package as bad
- send message to deploy server saying "i made package, here's url" and use ftp or scp or whatever to pull the files

- install listeners on all qa and prod machines that listen to deployment to know when to install latest stuff
- install one package at a time to QA
- mark passed

- shadow clone of Prod
- prod-dr checks that prod is okay
- prod-dr also gets new updates, identical to prod
- maybe need a new server as load balancer
- DB replication also necessary
    - turn on sql database replication
- databases should be able to talk to each other
- primary/primary replication
- digital ocean tutorial for db replication

- send logs to a new queue
- message broker sends logs to every machine
- fan out instead of topic
- log listener on every machine

- requirements
    - versoining
    - auto install
    - status tracking
    - rollback
    - add our stuff to systemd
    - distributed logger

deliverables
    - failover/.standby
    - database replications
    - managed by systemd
    - hashed passwords
    - distributed logger
    - responsive website
    - ssl use port 443 https
        - self-signed certificate is ok


not required, for extra points
- two-factor auth, text message
- ossim run on Prod; address some of them; show before/after reports
- NAGIOS install on Prod, monitors everything;