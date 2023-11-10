package schedules

import (
	"fmt"

	"github.com/manifoldco/promptui"
	"github.com/pablouser1/SchedOrganizer/db"
	"github.com/pablouser1/SchedOrganizer/models"
)

func RemoveMenu(schedules []models.Schedule) {
	options := promptui.Select{
		Label:     "Choose which to remove",
		Items:     schedules,
		Templates: GetTemplate(true),
	}

	index, _, err := options.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	db.RemoveSchedule(schedules[index].ID)
}
