package groups

import (
	"fmt"
	"strconv"

	"github.com/manifoldco/promptui"
	"github.com/pablouser1/SchedOrganizer/db"
)

func ShowMenu() {
	groups, err := db.GetAllGroups()

	if err != nil {
		fmt.Println(err)
		return
	}

	fmt.Println("The following groups are available:")
	for i, s := range groups {
		fmt.Println(strconv.FormatInt(int64(i+1), 10) + ". " + fmt.Sprint(s.Year) + s.Group)
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
		RemoveMenu(groups)
	}
}
