package groups

import "github.com/manifoldco/promptui"

func GetTemplate(delete bool) *promptui.SelectTemplates {
	common := "{{ .Year }}{{ .Group }}"

	selColor := "cyan"
	if delete {
		selColor = "red"
	}

	return &promptui.SelectTemplates{
		Label:    common,
		Active:   "\U0000261E {{ .Year | cyan }}{{ .Group | cyan }}",
		Inactive: common,
		Selected: "\U0000261E {{ .Year | " + selColor + " }}{{ .Group | " + selColor + " }}",
	}
}
