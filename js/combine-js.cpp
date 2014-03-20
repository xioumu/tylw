/*
 * Author:  xioumu
 * Created Time:  2014/3/20 19:15:19
 * File Name: combine-css.cpp
 * solve: combine-css.cpp
 */
#include<cstdio>
#include<cstring>
#include<cstdlib>
#include<cmath>
#include<algorithm>
#include<string>
#include<map>
#include<set>
#include<iostream>
#include<vector>
#include<queue>

using namespace std;
#define sz(v) ((int)(v).size())
#define rep(i, n) for (int i = 0; i < (n); ++i)
#define repf(i, a, b) for (int i = (a); i <= (b); ++i)
#define repd(i, a, b) for (int i = (a); i >= (b); --i)
#define clr(x) memset(x,0,sizeof(x))
#define clrs( x , y ) memset(x,y,sizeof(x))
#define out(x) printf(#x" %d\n", x)
#define sqr(x) ((x) * (x))
typedef long long lint;

const int maxint = -1u>>1;
const double eps = 1e-8;

int sgn(const double &x) {  return (x > eps) - (x < -eps); }

FILE *fin, *fout;
char fileName[200];
char tmp[10000000];

int main() {
    fout = fopen("all-js.js", "w");
    while (scanf("%s", &fileName) != EOF ) {
        puts(fileName);
        fin = fopen(fileName, "r");
        while (fgets(tmp, 10000000, fin)) {
            //fputs(tmp, fout);
            int len = strlen(tmp);
            //tmp[len - 1] = ' ';
            fprintf(fout, "%s", tmp);
        }
        fclose(fin);
    }
    return 0;
}
