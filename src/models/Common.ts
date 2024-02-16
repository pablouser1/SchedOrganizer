import { Model } from "objection";

export default abstract class Common extends Model {
  id!: number;
}
