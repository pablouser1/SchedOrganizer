import Common from "./Common";
import { Model } from "objection";
import Subject from "./Subject";

export default class Schedule extends Common {
  subject!: Subject;

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
      }
    };
  }
}
