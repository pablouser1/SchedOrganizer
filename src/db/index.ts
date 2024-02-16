import Knex from "knex";
import { Model } from "objection";
import Subjects from "./subjects";
import Schedules from "./schedules";

export default class Db {
  subjects: Subjects
  schedules: Schedules

  constructor(host: string, user: string, password: string, database: string) {
    // Initialize knex.
    const knex = Knex({
      client: 'mysql2',
      useNullAsDefault: true,
      connection: {
        host,
        user,
        password,
        database
      }
    });
    Model.knex(knex);

    this.subjects = new Subjects();
    this.schedules = new Schedules();
  }
}
