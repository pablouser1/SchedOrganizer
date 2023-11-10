package subjects

import (
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/pablouser1/SchedOrganizer/db"
	"github.com/pablouser1/SchedOrganizer/helpers"
	"github.com/pablouser1/SchedOrganizer/models"
)

func GetOne(c *gin.Context) {
	id := c.Param("id")

	idInt, err := strconv.ParseInt(id, 10, 32)

	if err != nil {
		helpers.SendJSON(c, 400, models.Subject{}, err, "Invalid id")
		return
	}

	subject, err := db.GetSubject(int32(idInt))
	if err != nil {
		helpers.SendJSON(c, 404, subject, err, "Subject not found")
		return
	}

	helpers.SendJSON(c, 200, subject, err)
}
