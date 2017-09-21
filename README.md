# Test Phalcon framework

A simple todo app to test the Phalcon framework and the Volt template engine 

## How to install

You need to execute the docker-compose.yml

```bash
$ docker-compose up -d
```

Then add the ip web container to your /etc/hosts or equivalent
```bash
$ docker ps # Get id of web container
$ docker inspect youridcontainer | grep -i ipaddress
```


```text
# /etc/hosts

ipaddress phalcon.dev
```

Go to http://phalcon.dev
