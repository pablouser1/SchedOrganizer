const { DB_HOST, DB_USER, DB_PASSWORD, DB_NAME } = process.env

const config = {
  client: 'mysql2',
  connection: {
    host: DB_HOST,
    user: DB_USER,
    password: DB_PASSWORD,
    database: DB_NAME
  }
};

export default config
