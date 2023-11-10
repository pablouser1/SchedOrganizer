package rooms

import "github.com/manifoldco/promptui"

func GetTemplate(delete bool) *promptui.SelectTemplates {
	common := "{{ .Location }} ({{ .Description }})"

	selColor := "cyan"
	if delete {
		selColor = "red"
	}

	return &promptui.SelectTemplates{
		Label:    common,
		Active:   "\U0000261E {{ .Location | cyan }} ({{ .Description | cyan }})",
		Inactive: common,
		Selected: "\U0000261E {{ .Location | " + selColor + " }} ({{ .Description | " + selColor + " }})",
	}
}
