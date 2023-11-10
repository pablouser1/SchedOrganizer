package subjects

import (
	"fmt"
	"strconv"

	"github.com/manifoldco/promptui"
	"github.com/pablouser1/SchedOrganizer/db"
)

func ShowMenu() {
	subjects, err := db.GetAllSubjects()

	if err != nil {
		fmt.Println(err)
		return
	}

	fmt.Println("The following subjects are available:")
	for i, s := range subjects {
		fmt.Println(strconv.FormatInt(int64(i+1), 10) + ". " + s.Name)
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
		RemoveMenu(subjects)
	}
}
