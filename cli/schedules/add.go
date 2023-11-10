package schedules

import (
	"fmt"

	"github.com/manifoldco/promptui"
	subjectsCli "github.com/pablouser1/SchedOrganizer/cli/subjects"
	timezonesCli "github.com/pablouser1/SchedOrganizer/cli/timezones"
	"github.com/pablouser1/SchedOrganizer/constants"
	"github.com/pablouser1/SchedOrganizer/db"
)

func AddMenu() {
	subjects, err := db.GetAllSubjects()

	if err != nil {
		fmt.Println(err)
		return
	}

	subjectOptions := promptui.Select{
		Label:     "Choose a subject",
		Items:     subjects,
		Templates: subjectsCli.GetTemplate(false),
	}

	subjectIndex, _, err := subjectOptions.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	weekdayOptions := promptui.Select{
		Label: "Choose a weekday",
		Items: constants.WEEKDAYS,
	}

	weekday, _, err := weekdayOptions.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	timezones, err := db.GetAllTimezones()

	if err != nil {
		fmt.Println(err)
		return
	}

	options := promptui.Select{
		Label:     "Choose a timezone",
		Items:     timezones,
		Templates: timezonesCli.GetTemplate(false),
	}

	timezoneIndex, _, err := options.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	err = db.AddSchedule(subjects[subjectIndex].ID, timezones[timezoneIndex].ID, int32(weekday))
	if err != nil {
		fmt.Println(err)
		return
	}
}
