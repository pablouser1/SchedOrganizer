package groups

import (
	"fmt"

	"github.com/manifoldco/promptui"
	"github.com/pablouser1/SchedOrganizer/db"
	"github.com/pablouser1/SchedOrganizer/models"
)

func RemoveMenu(groups []models.Group) {
	options := promptui.Select{
		Label:     "Choose which to remove",
		Items:     groups,
		Templates: GetTemplate(true),
	}

	index, _, err := options.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	db.RemoveGroup(groups[index].ID)
}
