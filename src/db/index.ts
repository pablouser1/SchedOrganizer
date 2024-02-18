import Knex from "knex";
import { Model } from "objection";
import Subjects from "./subjects";
import Schedules from "./schedules";

export default class Db {
  subjects: Subjects
  schedules: Schedules

  constructor() {
    const { DB_HOST, DB_USER, DB_PASSWORD, DB_NAME } = import.meta.env
    // Initialize knex.
    const knex = Knex({
      client: 'mysql2',
      useNullAsDefault: true,
      connection: {
        host: DB_HOST,
        user: DB_USER,
        password: DB_PASSWORD,
        database: DB_NAME
      }
    });
    Model.knex(knex);

    this.subjects = new Subjects();
    this.schedules = new Schedules();
  }
}
