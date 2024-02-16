import type { Knex } from "knex";


export async function up(knex: Knex): Promise<void> {
  return knex.schema
    .createTable("groups", table => {
      table.increments("id");
      table.integer("year").notNullable()
      table.integer("group").notNullable()
    })
    .createTable("timezones", table => {
      table.increments("id");
      table.string("from");
      table.string("to");
    });
    // TODO: Complete tables
}


export async function down(_knex: Knex): Promise<void> {
}

