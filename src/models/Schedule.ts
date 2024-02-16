import Common from "./Common";
import { Model } from "objection";
import Subject from "./Subject";
import Timezone from "./Timezone";

export default class Schedule extends Common {
  subject!: Subject;
  timezone!: Timezone;
  weekday!: number;

  static get tableName() {
    return 'schedules';
  }

  static get relationMappings() {
    return {
      subject: {
        relation: Model.HasOneRelation,
        modelClass: Subject,
        join: {
          from: 'subjects.id',
          to: 'schedules.subject_id'
        }
      },
      timezone: {
        relation: Model.HasOneRelation,
        modelClass: Timezone,
        join: {
          from: 'timezones.id',
          to: 'schedules.timezone_id'
        }
      }
    };
  }
}
