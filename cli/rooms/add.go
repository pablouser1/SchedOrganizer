package rooms

import (
	"fmt"

	"github.com/manifoldco/promptui"
	"github.com/pablouser1/SchedOrganizer/db"
)

func AddMenu() {
	locationPrompt := promptui.Prompt{
		Label: "Location",
		Validate: func(s string) error {
			if s == "" {
				return fmt.Errorf("empty string")
			}
			return nil
		},
	}

	location, err := locationPrompt.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	descriptionPromt := promptui.Prompt{
		Label: "Description",
	}

	description, err := descriptionPromt.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	err = db.AddRoom(location, description)
	if err != nil {
		fmt.Println(err)
		return
	}
}
