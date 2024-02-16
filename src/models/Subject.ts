import Group from "./Group";
import Common from "./Common";
import { Model } from "objection";

export default class Subject extends Common {
  name!: string;
  short_name!: string;
  url!: string;
  group!: Group;

  static get tableName() {
    return 'subjects';
  }

  static get relationMappings() {
    return {
      group: {
        relation: Model.HasOneRelation,
        modelClass: Group,
        join: {
          from: 'groups.id',
          to: 'subjects.group_id'
        }
      }
    };
  }
}
