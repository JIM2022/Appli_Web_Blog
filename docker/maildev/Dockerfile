FROM node:6

MAINTAINER Claude Khedhiri <claude@khedhiri.com>

RUN mkdir -p /usr/src/app
WORKDIR /usr/src/app

RUN npm install -g maildev

EXPOSE 1080 1025

CMD ["/usr/local/bin/maildev"]