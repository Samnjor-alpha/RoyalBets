package dvlp.lamseybets;

public class Gamma {
    public String tip;
    public String gameStarted;
    public String gameFinished;
    public String homeTeam;
    public String awayTeam;
    public String country;
    public String league;
    public String tipResult;
    public String homeScore;
    public String awayScore;
    public String odds;
    public String kickOff;

    public Gamma(String odds, String gameStarted, String gameFinished, String tip, String tipResult, String homeTeam, String country, String league, String awayTeam, String homeScore, String awayScore, String kickOff) {
        this.tip = tip;
        this.odds = odds;
        this.gameStarted = gameStarted;
        this.gameFinished = gameFinished;
        this.tipResult = tipResult;
        this.awayTeam = awayTeam;
        this.country = country;
        this.league = league;
        this.homeTeam = homeTeam;
        this.homeScore = homeScore;
        this.awayScore = awayScore;
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

    public String getHomeScore() {
        return homeScore;
    }

    public String getAwayScore() {
        return awayScore;
    }

    public String getKickOff() {
        return kickOff;
    }
}