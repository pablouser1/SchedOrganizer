class Time {
  _secs = 0;

  constructor(t) {
    this._secs = this._toSeconds(t)
  }

  increment() {
    this._secs++;
  }

  getSeconds() {
    return this._secs;
  }

  substract(other) {
    const otherSecs = other.getSeconds()

    const rem = this.getSeconds() - otherSecs
    return rem
  }

  static remainingTime(rem) {
    const minutes = ~~(rem / 60);
    const extraSeconds = rem % 60;

    return `${minutes} mins ${extraSeconds} secs`
  }

  _toSeconds(time) {
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
