package subjects

import (
	"fmt"

	"github.com/manifoldco/promptui"
	groupsCli "github.com/pablouser1/SchedOrganizer/cli/groups"
	"github.com/pablouser1/SchedOrganizer/db"
)

func AddMenu() {
	namePrompt := promptui.Prompt{
		Label: "Name",
	}

	name, err := namePrompt.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	shortNamePrompt := promptui.Prompt{
		Label: "Short name",
	}

	shortName, err := shortNamePrompt.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	urlPrompt := promptui.Prompt{
		Label: "URL",
	}
	url, err := urlPrompt.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	groups, err := db.GetAllGroups()

	if err != nil {
		fmt.Println(err)
		return
	}

	options := promptui.Select{
		Label:     "Choose a group",
		Items:     groups,
		Templates: groupsCli.GetTemplate(false),
	}

	groupIndex, _, err := options.Run()
	if err != nil {
		fmt.Println(err)
		return
	}

	db.AddSubject(name, shortName, url, groups[groupIndex].ID)
}
