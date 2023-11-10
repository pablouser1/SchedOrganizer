package subjects

import (
	"fmt"

	"github.com/manifoldco/promptui"
	"github.com/pablouser1/SchedOrganizer/db"
	"github.com/pablouser1/SchedOrganizer/models"
)

func RemoveMenu(subjects []models.Subject) {
	options := promptui.Select{
		Label:     "Choose which to remove",
		Items:     subjects,
		Templates: GetTemplate(true),
	}

	index, _, err := options.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	db.RemoveSubject(subjects[index].ID)
}
