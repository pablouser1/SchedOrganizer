import Subject from "../models/Subject";

export default class Subjects {
  async all(): Promise<Subject[]> {
    const subjects = await Subject.query().withGraphFetched('group')
    return subjects
  }

  async one(id: number): Promise<Subject | null> {
    const subject = await Subject.query().findById(id).withGraphFetched('group')
    return subject ?? null
  }
}
