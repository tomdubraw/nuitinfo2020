FROM node:14-alpine

COPY ./app/package.json ./app/yarn.lock /app/

WORKDIR /app
RUN yarn install

ENTRYPOINT [ "yarn" ]
CMD [ "dev" ]