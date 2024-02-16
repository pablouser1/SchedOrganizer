import Db from "./db";

const { DB_HOST, DB_USER, DB_PASSWORD, DB_NAME } = import.meta.env

export const db = new Db(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
