export default class Storage {
  private static _PREFIX = "sched"

  static get(key: string): string {
    return localStorage.getItem(Storage._getName(key)) ?? ''
  }

  static set(key: string, val: string): void {
    localStorage.setItem(Storage._getName(key), val)
  }

  static offset(): number {
    const val = Storage.get('offset')

    if (val === '') {
      return 0;
    }

    const off = parseInt(val)

    if (isNaN(off)) {
      return 0;
    }

    return off;
  }

  private static _getName(key: string): string {
    return `${Storage._PREFIX}-${key}`
  }
}
