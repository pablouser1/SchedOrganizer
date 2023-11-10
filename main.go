package main

import (
	"flag"
	"log"

	"github.com/gin-gonic/gin"
	"github.com/joho/godotenv"
	"github.com/pablouser1/SchedOrganizer/cli"
	"github.com/pablouser1/SchedOrganizer/db"
	"github.com/pablouser1/SchedOrganizer/middlewares"
	"github.com/pablouser1/SchedOrganizer/routes/schedules"
	"github.com/pablouser1/SchedOrganizer/routes/subjects"
)

type Args struct {
	Cli bool
}

func parseArgs() Args {
	cli := flag.Bool("cli", false, "Enters cli mode, which allows you to create new ")
	flag.Parse()
	return Args{
		Cli: *cli,
	}
}

func main() {
	err := godotenv.Load()
	if err != nil {
		log.Fatal("Error loading .env file")
	}

	db.Open()

	args := parseArgs()
	if args.Cli {
		cli.Run()
		return
	}

	r := gin.Default()
	r.SetTrustedProxies([]string{"127.0.0.1"})
	r.Use(middlewares.Cors())

	v1 := r.Group("/api/v1")
	{
		schedulesApi := v1.Group("/schedules")
		{
			schedulesApi.GET("/", schedules.GetAll)
			schedulesApi.GET("/closest", schedules.GetClosest)
			schedulesApi.GET("/weekdays/:weekday", schedules.GetByWeekDay)
		}

		subjectsApi := v1.Group("/subjects")
		{
			subjectsApi.GET("/", subjects.GetAll)
			subjectsApi.GET("/:id", subjects.GetOne)
		}
	}

	err = r.Run()

	if err != nil {
		log.Fatalln(err)
	}
}
