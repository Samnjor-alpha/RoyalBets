package dvlp.lamseybets;

public class halfmod {
    public String tip;
    public String gameStarted;
    public String gameFinished;
    public String homeTeam;
    public String awayTeam;
    public String country;
    public String league;
    public String tipResult;
    public String homeHalfTimeScore;
    public String awayHalfTimeScore;
    public String odds;
    public String kickOff;

    public halfmod(String odds, String gameStarted, String gameFinished, String tip, String tipResult, String homeTeam, String country, String league, String awayTeam, String homeHalfTimeScore, String awayHalfTimeScore, String kickOff) {
        this.tip = tip;
        this.odds = odds;
        this.gameStarted = gameStarted;
        this.gameFinished = gameFinished;
        this.tipResult = tipResult;
        this.awayTeam = awayTeam;
        this.country = country;
        this.league = league;
        this.homeTeam = homeTeam;
        this.homeHalfTimeScore = homeHalfTimeScore;
        this.awayHalfTimeScore = awayHalfTimeScore;
        this.kickOff = kickOff;

    }

    public String getOdds() {
        return odds;
    }

    public String getGameStarted() {
        return gameStarted;
    }

    public String getGameFinished() {
        return gameFinished;
    }

    public String getAwayTeam() {
        return awayTeam;
    }

    public String getCountry() {
        return country;
    }

    public String getLeague() {
        return league;
    }

    public String getTip() {
        return tip;
    }


    public String getHomeTeam() {
        return homeTeam;
    }


    public String getTipResult() {
        return tipResult;
    }

    public String gethomeHalfTimeScore() {
        return homeHalfTimeScore;
    }

    public String getawayHalfTimeScore() {
        return awayHalfTimeScore;
    }

    public String getKickOff() {
        return kickOff;
    }
}
