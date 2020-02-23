package dvlp.lamseybets

class halfmod(var odds: String, var gameStarted: String, var gameFinished: String, var tip: String, var tipResult: String, var homeTeam: String, var country: String, var league: String, var awayTeam: String, var homeHalfTimeScore: String, var awayHalfTimeScore: String) {

    fun gethomeHalfTimeScore(): String {
        return homeHalfTimeScore
    }

    fun getawayHalfTimeScore(): String {
        return awayHalfTimeScore
    }
}
