const now = new Date();
const timeNow = new Time(now.toTimeString().split(' ')[0]);

const schds_sections = document.getElementsByClassName("schedule");
const schedules = [];

const setupData = () => {
  for (const section of schds_sections) {
    const data_str = section.dataset.schd;
    if (!data_str) {
      console.error("Datset not available! Stopping", section);
      return;
    }

    const data = JSON.parse(data_str);

    data.element = section;
    data.timezone.start = new Time(data.timezone.start);
    data.timezone.finish = new Time(data.timezone.finish);

    schedules.push(data);
  }
}

const run = () => {
  timeNow.increment();
  for (const schd of schedules) {
    const sbsFinish = timeNow.substract(schd.timezone.finish);

    if (sbsFinish > 0) {
      // Finished
      setText("Finished", schd.element);
      continue;
    }

    const sbsStart = timeNow.substract(schd.timezone.start);
    if (sbsStart > 0) {
      // Happening
      const time = Time.remainingTime(Math.abs(sbsFinish));
      setText(`${time} left`, schd.element);
    } else {
      // Early
      const time = Time.remainingTime(Math.abs(sbsStart));
      setText(`${time} early`, schd.element);
    }
  }
}

const setText = (text, el) => {
  el.innerText = text;
}

const setupTimer = () => {
  setInterval(run, 1000);
  run();
}

setupData();
setupTimer();
