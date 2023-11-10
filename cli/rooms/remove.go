package rooms

import (
	"fmt"

	"github.com/manifoldco/promptui"
	"github.com/pablouser1/SchedOrganizer/db"
	"github.com/pablouser1/SchedOrganizer/models"
)

func RemoveMenu(rooms []models.Room) {
	options := promptui.Select{
		Label:     "Choose which to remove",
		Items:     rooms,
		Templates: GetTemplate(true),
	}

	index, _, err := options.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	db.RemoveRoom(rooms[index].ID)
}
