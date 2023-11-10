package subjects

import (
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/pablouser1/SchedOrganizer/db"
	"github.com/pablouser1/SchedOrganizer/helpers"
)

func GetAll(c *gin.Context) {
	subjects, err := db.GetAllSubjects()
	helpers.SendJSON(c, http.StatusOK, subjects, err)
}
