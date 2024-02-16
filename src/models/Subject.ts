import Group from "./Group";
import Common from "./Common";
import { Model } from "objection";
import Room from "./Room";

export default class Subject extends Common {
  name!: string;
  short_name!: string;
  url!: string;
  group!: Group;
  rooms: Room[] = [];

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
      },
      rooms: {
        relation: Model.ManyToManyRelation,
        modelClass: Room,
        join: {
          from: 'subjects.id',
          through: {
            from: 'subjects_rooms.subject_id',
            to: 'subjects_rooms.room_id'
          },
          to: 'rooms.id'
        }
      }
    };
  }
}
