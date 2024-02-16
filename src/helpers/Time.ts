export default class Time {
  private _secs: number = 0;

  constructor(t: string) {
    this._secs = this._toSeconds(t)
  }

  increment(): void {
    this._secs++;
  }

  getSeconds(): number {
    return this._secs;
  }

  substract(other: Time): number {
    const otherSecs = other.getSeconds()

    const rem = this.getSeconds() - otherSecs
    return rem
  }

  static remainingTime(rem: number): string {
    const minutes = ~~(rem / 60);
    const extraSeconds = rem % 60;

    return `${minutes} mins ${extraSeconds} secs`
  }

  private _toSeconds(time: string): number {
    let seconds = 0;
    const split = time.split(":")
    if (split.length === 2 || split.length === 3) {
      if (split.length === 2) {
        split.push("00")
      }
    }
    const h = parseInt(split[0])
    const m = parseInt(split[1])
    const s = parseInt(split[2])
    // Handling hours
    seconds += h * 60 * 60
    // Handling minutes
    seconds += m * 60
    // Handling seconds
    seconds += s

    return seconds
  }
}
