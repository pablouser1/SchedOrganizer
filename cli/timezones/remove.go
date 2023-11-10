package timezones

import (
	"fmt"

	"github.com/manifoldco/promptui"
	"github.com/pablouser1/SchedOrganizer/db"
	"github.com/pablouser1/SchedOrganizer/models"
)

func RemoveMenu(timezones []models.Timezone) {
	options := promptui.Select{
		Label:     "Choose which to remove",
		Items:     timezones,
		Templates: GetTemplate(true),
	}

	index, _, err := options.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	db.RemoveTimezone(timezones[index].ID)
}
