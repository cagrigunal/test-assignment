FROM node:16.15.1

WORKDIR /app

RUN npm rebuild esbuild

RUN exec "$@"

ADD . .

RUN npm install


CMD ["npm", "run", "dev"]