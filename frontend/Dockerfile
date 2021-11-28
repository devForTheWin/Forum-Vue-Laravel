FROM node:alpine

RUN npm install -g http-server

WORKDIR /app/frontend

COPY package*.json ./

RUN npm install

COPY . .

EXPOSE 8080
CMD [ "http-server", "dist" ]