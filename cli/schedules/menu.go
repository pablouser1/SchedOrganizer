package schedules

import (
	"fmt"
	"strconv"

	"github.com/manifoldco/promptui"
	"github.com/pablouser1/SchedOrganizer/constants"
	"github.com/pablouser1/SchedOrganizer/db"
)

func ShowMenu() {
	schedules, err := db.GetAllSchedules()

	if err != nil {
		fmt.Println(err)
		return
	}

	fmt.Println("The following schedules are available:")
	for i, s := range schedules {
		fmt.Println(strconv.FormatInt(int64(i+1), 10) + ". " + s.Subject.Name + " on " + constants.WEEKDAYS[s.Weekday] + " at " + s.Timezone.Start)
	}

	options := promptui.Select{
		Label: "Choose an option",
		Items: []string{
			"Add",
			"Remove",
			"Edit",
		},
	}

	index, _, err := options.Run()

	if err != nil {
		fmt.Println(err)
		return
	}

	switch index {
	case 0:
		AddMenu()
	case 1:
		RemoveMenu(schedules)
	}
}
