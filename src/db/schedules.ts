import Schedule from "../models/Schedule";

export default class Schedules {
  async all(): Promise<Schedule[]> {
    const schedules = await Schedule.query()
      .withGraphJoined('subject')
      .withGraphJoined('timezone')
      .orderBy("timezone.start", "ASC")
    return schedules
  }

  async one(id: number): Promise<Schedule | null> {
    const sched = await Schedule.query()
      .findById(id)
      .withGraphJoined('subject')
      .withGraphJoined('timezone')
      .orderBy("timezone.start", "ASC")
    return sched ?? null
  }

  async fromWeekday(num: number): Promise<Schedule[]> {
    const schedules = await Schedule.query()
      .where("weekday", "=", num)
      .withGraphJoined('subject')
      .withGraphJoined('timezone')
      .orderBy("timezone.start", "ASC")
    return schedules
  }
}
