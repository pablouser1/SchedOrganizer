package subjects

import "github.com/manifoldco/promptui"

func GetTemplate(delete bool) *promptui.SelectTemplates {
	selColor := "cyan"
	if delete {
		selColor = "red"
	}

	return &promptui.SelectTemplates{
		Label:    "{{ .Name }}",
		Active:   "\U0000261E {{ .Name | cyan }}",
		Inactive: "{{ .Name }}",
		Selected: "\U0000261E {{ .Name | " + selColor + " }}",
		Details: `
--------- Subject ----------
{{ "Name:" | faint }}	{{ .Name }}
{{ "URL:" | faint }}	{{ .Url }}
{{ "Group:" | faint }}	{{ .Group.Year }}º {{.Group.Group }}`,
	}
}
