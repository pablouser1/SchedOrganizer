package cli

import (
	"fmt"

	"github.com/manifoldco/promptui"
	"github.com/pablouser1/SchedOrganizer/cli/groups"
	"github.com/pablouser1/SchedOrganizer/cli/rooms"
	"github.com/pablouser1/SchedOrganizer/cli/schedules"
	"github.com/pablouser1/SchedOrganizer/cli/subjects"
	"github.com/pablouser1/SchedOrganizer/cli/timezones"
)

func Run() {
	options := promptui.Select{
		Label: "Welcome to SchedOrganizer",
		Items: []string{
			"Groups", "Rooms", "Timezones", "Subjects", "Schedules",
		},
	}

	index, _, err := options.Run()

	if err != nil {
		fmt.Println(err)
		return
	}

	switch index {
	case 0:
		groups.ShowMenu()
	case 1:
		rooms.ShowMenu()
	case 2:
		timezones.ShowMenu()
	case 3:
		subjects.ShowMenu()
	case 4:
		schedules.ShowMenu()
	}
}
