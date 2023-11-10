package timezones

import (
	"fmt"
	"strconv"

	"github.com/manifoldco/promptui"
	"github.com/pablouser1/SchedOrganizer/db"
)

func ShowMenu() {
	timezones, err := db.GetAllTimezones()

	if err != nil {
		fmt.Println(err)
		return
	}

	fmt.Println("The following timezones are available:")
	for i, s := range timezones {
		fmt.Println(strconv.FormatInt(int64(i+1), 10) + ". " + s.Start + " - " + s.Finish)
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
		RemoveMenu(timezones)
	}
}
